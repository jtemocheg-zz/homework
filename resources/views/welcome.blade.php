@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="center-block">
                    <h1 class="page-header text-center">Homework</h1>
                    <form>
                        <div class="form-group">
                            <label for="changeString">Change string: </label>
                            <div class="input-group">
                                <input name="changeString"
                                       id="changeString"
                                       placeholder="Insert a sentence"
                                       class="form-control"
                                />
                                <span class="input-group-btn">
                                    <button id="changeStringButton"
                                            class="btn btn-secondary ajax"
                                            type="button"
                                            data-target="#changeString"
                                            data-url="/changeString"
                                            data-text="#changeStringOutput"
                                    >
                                        Go!
                                    </button>
                                </span>
                            </div>
                            <p class="text-info">Return: <span id="changeStringOutput"></span></p>
                        </div>
                        <div class="form-group">
                            <label for="changeString">Complete range: </label>
                            <div class="input-group">
                                <input name="completeRange"
                                       id="completeRange"
                                       placeholder="Insert a sentence between ','"
                                       class="form-control"
                                />
                                <span class="input-group-btn">
                                    <button id="completeRangeButton"
                                            class="btn btn-secondary ajax"
                                            type="button"
                                            data-target="#completeRange"
                                            data-url="/completeRange"
                                            data-text="#completeRangeOutput"
                                    >
                                        Go!
                                    </button>
                                </span>
                            </div>
                            <p class="text-info">Return: <span id="completeRangeOutput"></span></p>
                        </div>
                        <div class="form-group">
                            <label for="changeString">Clear par: </label>
                            <div class="input-group">
                                <input name="clearPar"
                                       id="clearPar"
                                       placeholder="Insert a sentence"
                                       class="form-control"
                                />
                                <span class="input-group-btn">
                                    <button id="clearParButton"
                                            class="btn btn-secondary ajax"
                                            type="button"
                                            data-target="#clearPar"
                                            data-url="/clearPar"
                                            data-text="#clearParOutput"
                                    >
                                        Go!
                                    </button>
                                </span>
                            </div>
                            <p class="text-info">Return: <span id="clearParOutput"></span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <a href="{{ route('employees.index') }}" class="btn btn-primary">Employees</a>
    </div>
@stop

@section('script')
    <script>
        (function($) {

            var _token = "{{ csrf_token() }}";

            $('document').ready(function() {

                $('.ajax').click(function() {
                    var target = $(this).data('target');
                    var url = $(this).data('url');
                    var data = $(target).val();
                    var text = $(this).data('text');

                    $.ajax({
                        type: 'POST',
                        data: {data:data, '_token':_token},
                        url: url,
                        success: function(data) {
                            $(text).text(data.text);
                        },
                        error: function(data) {
                            $(text).text(data.responseJSON.data[0]);
                        }
                    });
                });

            })
        })(jQuery);
    </script>
@stop
