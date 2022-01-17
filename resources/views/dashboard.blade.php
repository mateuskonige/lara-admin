<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-2 sm:mx-4 sm:px-6 lg:px-8">
          @hasanyrole('writer|admin')
          <div class="mb-4 flex justify-end">
            <a href="#" type="button" class="hover:cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create Post
              </a>
        </div>
          @endhasanyrole
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Title
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                        @foreach (App\Models\Post::all() as $post)
                        <tr>                            
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                {{ $post->title }}
                              </div>
                              <div class="text-sm text-gray-500 ">
                                {{ $post->id }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          @hasanyrole('editor|admin')
                          <a href="#" type="button" class="hover:cursor-pointer ml-5 bg-white dark:bg-gray-600 py-2 px-3 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Edit
                          </a>
                          @endhasanyrole
                          @hasanyrole('publisher|admin')
                          <a href="#" type="button" class="hover:cursor-pointer ml-5 bg-green-400 dark:bg-green-600 py-2 px-3 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 dark:text-gray-200 hover:bg-green-50 dark:hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Publish
                          </a>
                          @endhasanyrole
                        </td>
                      </tr>
                      @endforeach

                      <!-- More people... -->
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
