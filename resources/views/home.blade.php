@extends('layouts.app')

@section('content')
<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
<input type="hidden" id="_page" name="_page" value="1" />
<input type="hidden" id="_maxPage" name="_maxPage" value="1" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <div class="card-body">

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">{{ __('Last 30 Days Update') }}</div>
                                    <div class="card-body">
                                        <div class="row ">

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">{{ __('Revenue') }}</div>
                                                    <div class="card-body text-center">
                                                        <div id="revenue_data" name="revenue_data" class="spinner-border"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">{{ __('Followers Gain') }}</div>
                                                    <div class="card-body text-center">
                                                        <div id="followers_data" name="followers_data" class="spinner-border"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">{{ __('Top 3 Items') }}</div>
                                                    <div class="card-body text-center">
                                                        <div id="top_data" name="top_data" class="spinner-border"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">{{ __('Recent Events') }}</div>
                                    <div class="card-body">
                                        <div id="event_data" name="event_data" class="spinner-border"></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
@endsection
