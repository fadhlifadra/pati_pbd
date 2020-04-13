{!! Form::model($model, ['url' => $pi_url, 'method' => 'get'] ) !!}
{!! Form::button('<i class="material-icons">featured_video</i><span>PI</span>', array('type' => 'submit', 'class' => 'btn bg-teal waves-effect')) !!}
{!! Form::close() !!}