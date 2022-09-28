<div class="py-5 mt-4 text-gray-500 pl-[30px]">
<div class="wrapper">
  
        <div class="tabs">
            <a class="inline tab">
                Osnovni detalji
            </a>
            <a class="tab inline ml-[70px]">
                Specifikacija 
            </a>
            <a class="tab inline ml-[70px]">
                Multimedija
            </a>      
        </div>
        
        <div class="tab_content">

        <div class="tab_item">
        <x-books.show_components.show_info :book="$book"></x-books.show_components.show_info>
        </div>

        <div class="tab_item">
        <x-books.show_components.show_specification :book="$book"></x-books.show_components.show_specification>
        </div>
        
        <div class="tab_item">
        <x-books.show_components.show_multimedia :book="$book"></x-books.show_components.show_multimedia>
        </div>
        
        </div>
        
    </div>
    </div>
 