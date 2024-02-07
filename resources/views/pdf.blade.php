<!DOCTYPE html>
<html>
<head>
	<title>Data Peminjaman</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Peminjam
                </th>
                <th scope="col" class="px-6 py-3">
                    Buku Yang Di Pinjam
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Peminjaman
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pengembalian
                </th>
            </tr>
		</thead>
		<tbody>
			<tr>
                @foreach ($rents as $rent)
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $rent->user }}
                </td>
                <td class="px-6 py-4">
                    {{ $rent->book }}
                </td>
                <td class="px-6 py-4">
                    {{ $rent->rent_date}}
                </td>
                <td class="px-6 py-4">
                    {{ $rent->return_date }}
                </td>
            </tr>
            @endforeach
            </tr>
		</tbody>
	</table>
 
</body>
</html>