@extends('layouts.app')

@section('content')

	<livewire:meeting-request-view  :adoptee="$adoptee" :meeting="$meeting" />
@endsection
