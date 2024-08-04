<x-layout>
    <h1 class="text-2xl font-bold mb-4">Student List</h1>
    <div class="w-full overflow-x-auto">
        <div class="w-full flex justify-center items-center">
            <a
                class="w-full flex justify-center items-center cursor-pointer my-4 py-2 px-3 rounded-md bg-blue-500 hover:bg-blue-600 duration-200 transition-all text-white">Create
                New
                Student</a>
        </div>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="w-full bg-gray-100 border-b border-gray-200">
                    <th class="py-2 px-4 text-left">Name</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Subject Name</th>
                    <th class="py-2 px-4 text-left">Subject Duration</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="w-full border-b border-gray-200">
                    <td class="py-2 px-4 hover:border-gray-300">{{ $student->name }}</td>
                    <td class="py-2 px-4">{{ $student->email }}</td>
                    <td class="py-2 px-4">{{ $student->subject->subject_name }}</td>
                    <td class="py-2 px-4">{{ $student->subject->duration }}</td>
                    <td class="py-2 px-4">
                        <a href="/students/create" class="py-2 px-3 rounded-md bg-blue-500 text-white">Edit</a>
                        <a href='#' class="py-2 px-3 rounded-md bg-red-500 text-white">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full my-4">
            {{$students->links()}}
        </div>
    </div>
</x-layout>