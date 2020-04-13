{!! Form::model($model, ['url' => $download_url, 'method' => 'get'] ) !!}
{!! Form::button('<i class="material-icons">assessment</i><span>Download</span>', array('type' => 'submit', 'class' => 'btn bg-indigo waves-effect')) !!}
{!! Form::close() !!}