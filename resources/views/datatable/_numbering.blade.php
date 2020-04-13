{!! Form::model($model, ['url' => $numbering_url, 'method' => 'put', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message] ) !!}
{!! Form::button('<i class="material-icons">assignment</i><span>Numbering</span>', array('type' => 'submit', 'class' => 'btn bg-indigo waves-effect')) !!}
{!! Form::close() !!}