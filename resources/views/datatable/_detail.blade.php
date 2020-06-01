{!! Form::model($model, ['url' => $detail_url, 'method' => 'get'] ) !!}
{!! Form::button('<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#DetailModal">Detail', array('type' => 'submit', 'class' => 'btn bg-teal waves-effect')) !!}
{!! Form::close() !!}