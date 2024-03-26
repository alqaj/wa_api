<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 p-4">
        <div class="max-w-full overflow-x-auto">
            <table class="w-full bg-white border border-gray-200 rounded shadow-md">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Pesan</th>
                        <th class="py-2 px-4">Pembuat</th>
                        <th class="py-2 px-4">Tgl Dibuat</th>
                        <th class="py-2 px-4">Tgl Harus Selesai</th>
                        <th class="py-2 px-4">Tgl Selesai</th>
                        <th class="py-2 px-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($data as $d)
                    <tr>
                        <td class="py-2 px-4">{{ $no }}</td>
                        <td class="py-2 px-4">{{ $d->detail }}</td>
                        <td class="py-2 px-4">{{ $d->pembuat }}</td>
                        <td class="py-2 px-4">{{ $d->tgl_dibuat }}</td>
                        <td class="py-2 px-4">{{ $d->tgl_harus_selesai }}</td>
                        <td class="py-2 px-4">{{ $d->tgl_selesai }}</td>
                        <td class="py-2 px-4">
                            @php
                                // Konversi string tgl_harus_selesai menjadi objek Carbon
                                $tgl_harus_selesai = \Carbon\Carbon::createFromFormat('Y-m-d', $d->tgl_harus_selesai);
                            @endphp
                            @if($d->status !='selesai' && $tgl_harus_selesai->isPast())
                                <span class="bg-red-200 text-red-700 py-1 px-2 rounded">Overdue</span>
                            @else
                                {{ $d->status }}
                            @endif
                        </td>
                    </tr>
                    @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>