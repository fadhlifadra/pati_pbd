{!! Form::model($model, ['url' => $pt_url, 'method' => 'get'] ) !!}
{!! Form::button('<i class="material-icons">featured_play_list</i><span>PT</span>', array('type' => 'submit', 'class' => 'btn bg-blue-grey waves-effect')) !!}
{!! Form::close() !!}