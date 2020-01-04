@extends('layouts.default',['titre'=>'Contact'])

@section('content')
    <div class="container col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="row">
            <div class="contact">
                <h2>Get In Touch</h2>
                <p class="text-muted">Si vous avez des questions contact-moi directement <a href="mailto:yasserchaib95@gmail.com">par Gmail</a>.</p>     
                
                <form action="{{route('contact_path')}}" method="POST" novalidate>
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" value="{{old('name')}}" class="form-control form-block {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" required="required">
                          <small id="" class="form-text text-muted">Votre not est votre identité.</small>
                          {!! $errors->first('name','<div class="help-block invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" required="required">
                            <small id="emailHelp" class="form-text text-muted">Ne jamais partager votre e-mail.</small>
                            {!! $errors->first('email','<div class="help-block invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                                <label for="message">Message</label>
                            <textarea name="message" name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" id="message" cols="30" rows="10" required="required">{{old('message')}}</textarea>
                            {!! $errors->first('message','<div class="help-block invalid-feedback">:message</div>') !!}
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Envoyer</button>
                </form>
            </div>

        </div>
    </div>
@endsection