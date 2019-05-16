@foreach($list as $role)
    <tr row_id_role="<?php echo $role->id; ?>">
        <td class="text-center" data-target="idRole">{{ $role->id }}</td>
        <td class="text-center" data-target="typeRole">{{ $role->type }}</td>
        <td class="text-center">
            <a href="#" class="blue edit-role" id="<?php echo $role->id; ?>" data-type="{{$role->type}}" data-role="update-role" data-toggle="modal">
                <i class="ace-icon fa fa-pencil bigger-130"></i>
            </a>
        </td>
        
        <td class="text-center">
            <a class="red" href="#" id="<?php echo $role->id; ?>" data-role="delete-role" data-toggle="modal">
                <i class="ace-icon fa fa-trash-o bigger-130"></i>
            </a>

        </td>
    </tr>

@endforeach