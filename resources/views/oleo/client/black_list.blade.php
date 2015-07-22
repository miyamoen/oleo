@extends('layouts.master')

@section('content')
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--6-col">
    <form action="http://cefce6.cplaza.engg.nagoya-u.ac.jp/oleo-client/black-list" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col" id="black_register_button">
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent">
            <i class="material-icons">add</i>
          </button>
          <div for="black_register_button" class="mdl-tooltip mdl-tooltip--large">Register on Black List</div>
        </div>

        <div class="mdl-cell mdl-cell--4-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="black_number" name="black_number"/>
          <label class="mdl-textfield__label" for="black_number">To register number on black list...</label>
          <span class="mdl-textfield__error">Input is not a number!</span>
        </div>
      </div>
    </form>
  </div>

  <div class="mdl-cell mdl-cell--6-col">
    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
      <thead>
        <tr>
          <th>Black Number</th>
        </tr>
      </thead>
      <tbody>
      @if (count($black_numbers) > 1)
        @foreach ($black_numbers as $black_number)
          <tr>
            <td>{{ $black_number }}</td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
  </div>
</div>
@endsection