<x-layout>
    <div class="w-full min-h-screen flex justify-center items-center bg-blue-50">
        <div class="bg-white shadow-md rounded-lg p-8 w-1/2">
            <h1 class="text-3xl font-semibold mb-4 text-center">Student Details</h1>
            <div class="w-full flex justify-center items-center my-4">
                <img class="w-full bg-cover" src="{{$student->image_url}}" alt="image" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <div class="bg-gray-100 p-2 rounded">{{ $student->name }}</div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <div class="bg-gray-100 p-2 rounded">{{ $student->email }}</div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Subject name:</label>
                <div class="bg-gray-100 p-2 rounded">{{ $student->subject->subject_name }}</div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Subject Duration:</label>
                <div class="bg-gray-100 p-2 rounded">{{ $student->subject->duration }}</div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('students.index') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition duration-300">Back
                    to list</a>
            </div>
        </div>
    </div>
</x-layout>