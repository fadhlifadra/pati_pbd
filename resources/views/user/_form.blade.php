
<div class="row">
<div class="col-sm-8">
        <div class="form-group form-float{{ $errors->has('email') ? 'has-error': '' }} ">
            {!! Form::label('email', 'Email', ['class'=>'form-label']) !!}
            <div class="form-line">
                {!! Form::text('email', null, ['class'=>'form-control']) !!} 
            </div>
            {!! $errors->first('email', '<p class="error">:message</p>') !!}
        </div>
    </div>
<div class="col-sm-8">
        <div class="form-group form-float{{ $errors->has('nama') ? 'has-error': '' }} ">
            {!! Form::label('nama', 'Nama', ['class'=>'form-label']) !!}
            <div class="form-line">
                {!! Form::text('nama', null, ['class'=>'form-control']) !!} 
            </div>
            {!! $errors->first('nama', '<p class="error">:message</p>') !!}
        </div>
    </div>
<div class="col-sm-8">
    <div class="form-group form-float{{ $errors->has('email') ? 'has-error': '' }} ">
        {!! Form::label('password', 'Password', ['class'=>'form-label']) !!}
         <div class="form-line">
             {!! Form::password('password', ['class'=>'form-control']) !!} 
         </div>
          {!! $errors->first('password', '<p class="error">:message</p>') !!}
      </div>
     </div>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="form-group form-float{{ $errors->has('role_id') ? 'has-error': '' }} ">
            {!! Form::label('role_id', 'User Role', ['class'=>'form-label']) !!}
            {!! Form::select('role_id', ['' => '']+App\Role::pluck('display_name','id')->all(), null, 
            [ 'class' => 'js-selectize', 'placeholder' => 'Pilih User Role' ]) !!}
            {!! $errors->first('role_id', '<p class="error">:message</p>') !!}
        </div>
    </div>
</div>

<div class="marg" style="display: inline;">
      <div style="float: left;">
        <p><a class="btn btn-primary btn-sm waves-effect" onclick="history.back()"> 
         <i class="material-icons">keyboard_arrow_left</i> <span>Back</span></a> </p>
      </div>
      <div style="float: right;">
      {!! Form::submit ('Simpan',['class'=>'btn btn-primary btn-lg waves-effect']) !!}
     </div>
     <br>
     <br>
</div>

<script src="{{ asset('adminbsb/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
function getobAudit(id){    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/getdropdown",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
            var html = '<option value="" selected="selected"> Pilih Bagian / Unit</option>';
            var i;
            for(i=0; i<data.length; i++){
                @if(!empty($editdata->bag_unit_id))
                    // <option selected value="{{ $row->id }}">{{ $row->name_obj_audit }}</option>
                    if(data[i].id == {{ $editdata->bag_unit_id }}) html += '<option value='+data[i].id+' selected>'+data[i].name_bag_unit+'</option>';
                    else html += '<option value='+data[i].id+'>'+data[i].name_bag_unit+'</option>';
                @else
                    html += '<option value='+data[i].id+'>'+data[i].name_bag_unit+'</option>';
                @endif
            }
            $('#bagUnit').html(html);
            
        }
    });
}
$(document).ready(function() {
    var id = document.getElementById('obAudit').value
    getobAudit(id)

    $('#obAudit').change(function() {
        id=$(this).val();
        console.log(id)
        getobAudit(id)
    });
});
</script>



