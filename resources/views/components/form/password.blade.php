<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">{{$isim}}
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {{ Form::password($name,array_merge(['class' => 'form-control col-md-7 col-xs-12'], $attributes)) }}
    </div>
</div>