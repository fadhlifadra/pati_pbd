{!! Form::model($model, ['url' => $recalculate_url, 'method' => 'get'] ) !!}
{!! Form::button('<i class="material-icons">assessment</i><span>Recalculate</span>', array('type' => 'submit', 'class' => 'btn bg-indigo waves-effect')) !!}
{!! Form::close() !!}