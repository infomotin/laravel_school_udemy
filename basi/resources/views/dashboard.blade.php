<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             <b style="float: left;"> Hi, {{ Auth::user()->name }}</b>
            <b style="float: right;">Total User
            <span class="badge badge-danger"><a>{{ count($user) }}</a></span>
            </b>
        </h2>


    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                {{-- <x-jet-welcome />
                <h1>Some thing For Testing </h1> --}}
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actived Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($user as $use)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $use->name }}</td>
                            <td>{{ $use->email }}</td>
                            <td>{{ $use->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</x-app-layout>
