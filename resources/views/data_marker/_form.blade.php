<div class="row">
    <div class="col-sm-2">
        <div class="form-group form-float{{ $errors->has('status') ? 'has-error': '' }} ">
            {!! Form::label('status', 'Tindak Lanjut', ['class'=>'form-label']) !!}
                {!! Form::select('status', ['1' => 'Approve', '3' => 'Deny'], null,[ 'class' => 'js-selectize', 'placeholder' => 'Pilih Status' ]) !!}
            {!! $errors->first('status', '<p class="error">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <center>
        <div class="col-sm-6" align="right">
        <p><a class="btn btn-primary button1 waves effect" onclick="history.back()">
        <i class="material-icons">keyboard_arrow_left</i><span>back</span></a></p>
        </div>
        <div class="col-sm-6" align="left">
        {!! Form::submit ('Simpan',['class'=>'btn btn-primary waves-effect']) !!} 
        </div>
    </center>
</div>

{{-- <div class="form-group form-float{{ $errors->has('org_id') ? 'has-error': '' }} ">
    {!! Form::label('org_id', 'Organization', ['class'=>'form-label']) !!}
        {!! Form::select('org_id', ['' => '']+App\mOrganization::pluck('org_description','id')->all(), null, [ 'class' => 'js-selectize', 'placeholder' => 'Pilih Organization' ]) !!}
    {!! $errors->first('org_id', '<p class="error">:message</p>') !!}
</div> 

<div class="form-group form-float{{ $errors->has('parent_id') ? 'has-error': '' }} ">
    {!! Form::label('parent_id', 'Parent', ['class'=>'form-label']) !!}
        {!! Form::select('parent_id', ['' => '']+$m_parent->pluck('division','id')->all(), null, [ 'class' => 'js-selectize', 'placeholder' => 'Pilih Parent' ]) !!}
    {!! $errors->first('parent_id', '<p class="error">:message</p>') !!}
</div>

<div class="form-group form-float{{ $errors->has('head_nip') ? 'has-error': '' }} ">
    {!! Form::label('head_nip', 'Head', ['class'=>'form-label']) !!}
        {!! Form::select('head_nip', ['' => '']+$m_user->pluck('label','head_nip')->all(), null, [ 'class' => 'js-selectize', 'placeholder' => 'Pilih Head' ]) !!}
    {!! $errors->first('head_nip', '<p class="error">:message</p>') !!}
</div>--}}




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
