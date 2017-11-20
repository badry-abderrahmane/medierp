@extends('layouts.main')

@section('content')
  <div class="pageloader is-active" v-show="isLoading"></div>
  <router-view></router-view>
@endsection
