@extends('admin.layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_windon_welc">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12" style="min-height: 800px">
                    <h1 class="name_title_cabinet">Бігуча стрічка новин</h1>


                    <form method="POST" action="{{ route('admin.ticker.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="ticker" class="col-md-3 title_form_add_new text-md-right">Нові дані бігучої стрічки:</label>
                            <div class="col-md-9">
                                <input type="text" name="ticker" placeholder="інфо" style="width: 100%" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="add_new_action_admin">
                                    Оновини
                                </button>

                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Дані</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($arrTicker as $t)
                                <tr>
                                    <td>{{ $t->id }}</td>
                                    <td>{{ $t->info }}</td>
                                    <td class="text-right">
                                            <a href="{{ route('admin.ticker.togged', $t) }}" title="Toggle ticker {{ $t->is_active ? 'off' : 'on' }}" data-method="put"  data-confirm="Ви впевнені?">
                                                @if ($t->is_active)
                                                    <i class="fas fa-toggle-on text-success"></i>
                                                @else
                                                    <i class="fas fa-toggle-off text-danger"></i>
                                                @endif
                                            </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </div>


    <div id="footer">
        @include('admin.layouts.footer')
    </div>
@endsection

