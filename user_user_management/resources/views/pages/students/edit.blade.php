<x-layout>
    <div class="w-full flex justify-center items-center bg-slate-200 rounded-lg py-4 px-8">
        <form class="w-full flex justify-center items-center flex-col" method="POST"
            action="/students/update/{{$student->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col w-full mb-4">
                <label class="mb-2">Image</label>
                <input type="file" value="{{$student->image_url}}" name="image_url" class="w-full p-2 border rounded" />
            </div>
            <div class="flex flex-col w-full mb-4">
                <label class="mb-2">Name</label>
                <input type="text" value="{{$student->name}}" name="name" placeholder="Name"
                    class="w-full p-2 border rounded" />
            </div>
            <div class="flex flex-col w-full mb-4">
                <label class="mb-2">Email</label>
                <input type="email" value="{{$student->email}}" name="email" placeholder="Email"
                    class="w-full p-2 border rounded" />
            </div>
            <div class="flex flex-col w-full mb-4">
                <label class="mb-2">Subject</label>
                <select name="subject_id" value="{{$student->subject_id}}" class="w-full p-2 border rounded">
                    @foreach ($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Submit</button>
        </form>
    </div>
</x-layout>