{!! Form::model($model, ['url' => $detail_url, 'method' => 'get'] ) !!}
{!! Form::button('<i class="material-icons">details</i><span><b>Detail</b></span>', array('type' => 'submit', 'class' => 'btn bg-blue waves-effect')) !!}
{!! Form::close() !!}