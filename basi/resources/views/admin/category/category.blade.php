<x-app-layout>
    <x-slot name="header">
   <b> All Category </b>
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
                        {{-- @php($i=1)
                        @foreach ($user as $use) --}}
                        <tr>
                            <th scope="row">
                                {{-- {{ }} --}}
                            </th>
                            <td>
                                {{-- {{ }} --}}

                            </td>
                            <td>

                                {{-- {{  }} --}}

                            </td>
                            <td>

                                {{-- {{  }} --}}

                            </td>
                        </tr>
                        {{-- @endforeach --}}

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</x-app-layout>
