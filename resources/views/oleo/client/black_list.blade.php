@extends('layouts.master')

@section('content')
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--4-col mdl-grid">
    <div class="mdl-cell mdl-cell--1-col" id="black_register_button">
      <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent">
        <i class="material-icons">add</i>
      </button>
      <div for="black_register_button" class="mdl-tooltip mdl-tooltip--large">Register on Black List</div>
    </div>

    <div class="mdl-cell mdl-cell--3-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="black_number" name="black_number"/>
      <label class="mdl-textfield__label" for="black_number">Enter a phone number to register on black list...</label>
      <span class="mdl-textfield__error">Input is not a number!</span>
    </div>

  </div>
</div>



@endsection