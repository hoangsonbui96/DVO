<?php

namespace App\Http\Controllers;

use App\Models\MFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Illuminate\Support\Facades\Artisan;
use MongoDB\Driver\Session;
use MongoDB\Client;

class MFamilyController extends Controller
{
    //
    public function index(){
        return view('mfamily.index', ['families' => DB::table('m_family')->paginate(3)]);
    }

    public function create(){
        return view('mfamily.create', ['db_host' => env('DB_HOST'),
                                       'db_port' => env('DB_PORT')
                                      ]);
    }

    public function testConnection(){
        try {
            DB::getMongoClient()->listDatabases();
            echo (DB::getMongoClient());
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function store(Request $request){
        $request->validate([
            'family_name' => 'required|string',
            'user_name' => 'required|string|unique:t_customer',
            // 'family_hometown' => 'required|string',
            // 'family_anniversary' => 'required|date',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'birth_day' => 'required|date',
            'password' => 'required|confirmed',
            'db_user' => 'required',
            'db_pwd' => 'required',
            'db_host' => 'required',
            'db_port' => 'required',
        ]);

        //$client = new \MongoDB\Client('mongodb://akb:akb1564ltt@192.168.1.206/');
        $client = new \MongoDB\Client('mongodb://localhost:27017');
        $session = $client->startSession();
        $session->startTransaction();
        try{
            $id = $client->selectCollection('dvo','m_family')->insertOne(
                [
                    'family_name' => $request->input('family_name'),
                    'family_hometown' => $request->input('family_hometown'),
                    'family_anniversary' => $request->input('family_anniversary'),
                ],['session' => $session]
            );

            $client->selectCollection('dvo', 't_customer')->insertOne(
                [
                    'user_name' => $request->user_name,
                    'password' => $request->password,
                    'full_name' => $request->full_name,
                    'birth_day' => $request->birth_day,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'ref_family_id' => $id->getInsertedId(),
                ],['session' => $session]
            );

            //throw new Exception('test');

            $client->selectCollection('dvo', 'm_database')->insertOne(
                [
                    'db_user' => $request->db_user,
                    'db_pwd' => $request->db_pwd,
                    'db_host' => $request->db_host,
                    'db_port' => $request->db_port,
                    'ref_family_id' => $id->getInsertedId(),
                ],['session' => $session]
            );

            //get Id from created database
            $getid = $id->getInsertedId();

            //get all collection from templateDB
            $listCollection = $client->templateDB->listCollections();
            foreach($listCollection as $collections){
                //get all document from getted collection
                $document = DB::connection('mongodb2')->table($collections['name'])->get();
                $client->selectCollection("dvo_".$getid, $collections['name'])->insertMany($document->toArray(), ['session' => $session]);
            }
            $session->commitTransaction();
        }catch (Exception $e){
            $session->abortTransaction();
            throw new Exception($e->getMessage());
            $session->endSession();
        }
    }

    public function getSearchAjax(Request $request)
    {
        $query = $request->get('query');
        $page = $request->get('page');
        //dd($query.'---'.$page);
        if ($query == '') {
            $data = DB::table('m_family')->paginate(3);
        } else {
            $data = DB::table('m_family')
                        ->where('family_name', 'LIKE', "%{$query}%")
                        ->orWhere('family_hometown', 'LIKE', "%{$query}%")
                        ->paginate(3);
        }
        return response()->json($data);
    }

    // public function getPagination(Request $request){
    //     if($request->ajax()){
    //         $families = DB::table('m_family')->paginate(2);
    //         return view('mfamily.pagination_child', compact('families'))->render();
    //     }   
    // }
}
