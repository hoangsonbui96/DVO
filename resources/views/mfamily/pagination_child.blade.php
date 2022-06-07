<?php $i = 0; ?>
@foreach ($families as $family)
@php
    $i++;
@endphp
<a href=""></a>
<tr class="data-table">
    <td>{{$i}}</td>
    <td>{{$family['family_name']}}</td>
    <td>{{$family['family_hometown']}}</td>
    <td>{{$family['family_anniversary']}}</td>
    {{-- <td>                 
      <a href="{{route('customer.edit', $family['_id'])}}" title="Edit"><i class="fas fa-edit"></i></a>
      <button type="" style="border: none; background: none"  data-toggle="modal" data-target="#deleteConfirm{{$cus['_id']}}"><a href="#" title="Delete"><i class="fas fa-ban"></i></a></button>
      start from modal
      <form action="{{route('destroy', $cus['_id'])}}" method="POST">
        <div class="modal fade" id="deleteConfirm{{$cus['_id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm{{$cus['_id']}}" aria-hidden="true">
          <div class="modal-dialog" role="document" style="margin: 18.75rem auto!important">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <span>Bạn có chắc chắn muốn xóa tài khoản ?</span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-primary">Xóa</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </td> --}}
</tr>
@endforeach