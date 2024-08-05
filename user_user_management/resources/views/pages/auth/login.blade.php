<x-layout>
    <div class="w-full flex justify-center items-center bg-slate-200 rounded-lg py-4 px-8">
        <form class="w-full flex justify-center items-center flex-col" method="POST" action="{{route('login')}}">
            @csrf

            <div class="flex flex-col w-full mb-4">
                <label class="mb-2">Email</label>
                <input type="email" value="{{old('email')}}" name="email" placeholder="Email"
                    class="w-full p-2 border rounded" />
            </div>
            <div class="flex flex-col w-full mb-4">
                <label class="mb-2">Password</label>
                <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded" />
            </div>

            <button type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Submit</button>
        </form>
    </div>
</x-layout>