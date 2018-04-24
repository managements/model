@extends('layout.layout')
@section('content')
    <!-- users, info, media, -->
    <div class="panel">
        <div class="panel-header">liste des utilisateurs</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>profil</th>
                    <th>fill_name</th>
                    <th>email</th>
                    <th>tel</th>
                    <th>show</th>
                </tr>
                </thead>
                <tbody>
                @foreach($output as $user)
                    <tr>
                        <th>

                            <img src="{{asset( (!empty($user->info->profil)) ? 'uploads/' . $user->info->profil : 'uploads/images/profil/profil.png' ) }}"
                                 class="img-md"
                                 alt="profil">
                        </th>
                        <th>
                            @if(!empty($user->info->last_name) || (!empty($user->info->last_name)))
                                {{ $user->info->last_name . ' ' . $user->info->first_name }}
                                @else
                                inconnu
                            @endif

                        </th>
                        <th>{{ $user->email }}</th>
                        <th>{{ (!empty($user->info->tel)) ? $user->info->tel : 'inconnu' }}</th>
                        <th><a href="{{route('profil.show',$user)}}">show</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop