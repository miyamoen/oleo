@extends('layouts.master')

@section('content')
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
      <thead>
        <tr>
          <th class="mdl-data-table__cell--non-numeric">Call Sid</th>
          <th class="mdl-data-table__cell--non-numeric">Dial Call Status</th>
          <th class="mdl-data-table__cell--non-numeric">Account Sid</th>
          <th>Call Duration</th>
          <th class="mdl-data-table__cell--non-numeric">Recording Url</th>
        </tr>
      </thead>
      <tbody>
      @if (count($logs) > 1)
        @foreach ($logs as $log)
          <tr>
            <td class="mdl-data-table__cell--non-numeric">{{ $log->Call_Sid }}</td>
            <td class="mdl-data-table__cell--non-numeric">{{ $log->DialCallStatus }}</td>
            <td class="mdl-data-table__cell--non-numeric">{{ $log->AccountSid }}</td>
            <td>{{ $log->CallDuration }}</td>
            <td class="mdl-data-table__cell--non-numeric">{{ $log->RecordingUrl }}</td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
  </div>
</div>
@endsection