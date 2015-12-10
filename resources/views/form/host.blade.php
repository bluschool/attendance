
<div class="col-md-12">
    <h1 class="text-center bold">ACCREDITATION</h1>
    <h2 class="text-center">HOST BROADCASTER</h2>
</div>

<div class="col-md-12">
    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
{!! Form::open(['url'=>handles('host/member/registration'), 'files'=>true]) !!}
{!! Form::hidden('user_id', Auth::user()->id) !!}

<fieldset>
    
        <div class="col-md-6 form-group">
            {!! Form::label('name', 'NAME') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('gender', 'GENDER') !!}
            {!! Form::select('gender', [''=>'Choose Form List','male'=>'Male', 'female'=>'Female', 'other'=>'Other'], null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('role', 'DESIGNATION/ROLE/ACTIVITY') !!}
            {!! Form::select('role', [''=>'Choose Form List', 'tv_crew'=>'TV Crew', 'commentator'=>'Commentator', 'presenter'=>'Presenter'], null, ['class'=>'form-control select2', 'style'=>'width: 100%;']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('nationality', 'NATIONALITY') !!}
            {!! Form::text('nationality', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('mobile', 'Mobile') !!}
            {!! Form::text('mobile', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('date_of_birth', 'DATE OF BIRTH') !!}
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('date_of_birth', null, ['class'=>'form-control', 'data-inputmask'=>"'alias': 'dd/mm/yyyy'",  'data-mask']) !!}
            </div>
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('country_of_birth', 'COUNTRY OF BIRTH') !!}
            {!! Form::text('country_of_birth', null, ['class'=>'form-control']) !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('personal_id', 'PASSPORT OR NID NUMBER') !!}
            {!! Form::text('personal_id', null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::hidden('passport_expiry_date', 'PASSPORT EXPIRY DATE') !!}
                {!! Form::hidden('passport_expiry_date', '01/01/2011') !!}
        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('present_address', 'PRESENT RESIDENT ADDRESS') !!}
            {!! Form::text('present_address1', null, ['class'=>'form-control', 'placeholder'=>'Line 1']) !!}
            {!! Form::text('present_address2', null, ['class'=>'form-control', 'placeholder'=>'Line 2']) !!}
            <div class="col-md-6 form-group no-padding">
                {!! Form::hidden('present_district', 'Dhaka') !!}

            </div>
            <div class="col-md-6 form-group no-padding">
                {!! Form::hidden('present_zip', '1000') !!}
            </div>

        </div>

        <div class="col-md-6 form-group">
            <div class="pull-right">{!! Form::checkbox('checkbox', null, false, ['id'=>'address']) !!}Same As Present</div>

            {!! Form::label('permanent_address', 'PERMANENT RESIDENT ADDRESS') !!}
            {!! Form::text('permanent_address1', null, ['class'=>'form-control', 'placeholder'=>'Line 1']) !!}
            {!! Form::text('permanent_address2', null, ['class'=>'form-control', 'placeholder'=>'Line 2']) !!}
            <div class="col-md-6 form-group no-padding">
                {!! Form::hidden('permanent_district', 'Dhaka') !!}

            </div>
            <div class="col-md-6 form-group no-padding">
                {!! Form::hidden('permanent_zip', '1000') !!}
            </div>

        </div>

        <div class="col-md-6 form-group">
            {!! Form::label('attachment', 'SCAN COPY OF PASSPORT BIO-PAGE OR NID') !!}
            {!! Form::file('file2', ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-6 form-group">
            {!! Form::label('photo', 'UPLOAD RECENTLY TAKEN PORTRAIT PHOTO') !!}
            {!! Form::file('file1',  ['class'=>'form-control']) !!}
        </div>
</fieldset>

    <fieldset>
        <div class="divider"></div>
        
            <div class="col-md-3 form-group">
                {!! Form::submit('Submit', ['class'=>'form-control btn-success ']) !!}
            </div>
    </fieldset>
    {!! Form::close() !!}


</div>