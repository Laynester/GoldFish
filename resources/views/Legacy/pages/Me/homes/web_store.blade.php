<div class="store_overlay" id="store_overlay">
    <div class="store">
        <ul class="navi nav nav-tab">
            <li class="active"><a data-toggle="tab" id="viewInventory" href="#inventory">Inventory <span id="newItems">(<b id="newItemsCount">0</b>)</span></a></li>
            <li><a data-toggle="tab" id="viewStore" href="#store">Store</a></li>
        </ul>
        <button class="close_store">x</button>
        <div class="container">
            <div class="tab-content">
                <div id="inventory" class="tab-pane fade active show">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="tab">
                                <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'Stickers')">Stickers</button>
                                <button class="tablinks" onclick="openTab(event, 'Backgrounds')">Backgrounds</button>
                                <button class="tablinks" onclick="openTab(event, 'Widgets')">Widgets</button>
                                <button class="tablinks" onclick="openTab(event, 'Notes')">Notes</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div id="inventory_stickers">
                                <div id="Stickers" class="tabcontent" style="display:none;">
                                    @if($stickers->isEmpty())
                                    You have no stickers!!!
                                    @else
                                    <div class="store_grid">
                                    @foreach($stickers as $sticker)
                                        <div
                                        class="store_item store_item_sticker"
                                        data-id="{{$sticker->id}}"
                                        data-name="{{$sticker->name}}"
                                        data-type="{{$sticker->type}}-inv"
                                        onclick="storePreview(this)"
                                        style="background-image:url(/images/homestickers/{{$sticker->name}}.gif);"
                                        >
                                        </div>
                                    @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div id="inventory_bgs">
                                <div id="Backgrounds" class="tabcontent" style="display:none;">
                                    @if($bgs->isEmpty())
                                    You have no backgrounds!!!
                                    @else
                                    <div class="store_grid">
                                    @foreach($bgs as $bg)
                                        <div
                                        class="store_item"
                                        data-id="{{$bg->id}}"
                                        data-name="{{$bg->name}}"
                                        data-type="{{$bg->type}}-inv"
                                        onclick="storePreview(this)"
                                        style="background-image:url(/images/profile_backgrounds/{{$bg->name}})"
                                        >
                                        </div>
                                    @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div id="Widgets" class="tabcontent" style="display:none;">
                                @foreach($widgets as $widget)
                                <div class="store_item widgets" data-id="{{$widget->id}}" data-type="w-inv" data-name="{{$widget->name}}" onclick="storePreview(this)">
                                    <div class="widgets_icon {{$widget->name}}"></div>
                                    <div class="widget_data">
                                        @if($widget->name == 'rooms')
                                        Rooms Widget
                                        @endif
                                        @if($widget->name == 'mybadges')
                                        Badges Widget
                                        @endif
                                        @if($widget->name == 'friends')
                                        Friends Widget
                                        @endif
                                        @if($widget->name == 'groups')
                                        Groups Widget
                                        @endif
                                        @if($widget->name == 'photo')
                                        Photo Widget
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div id="Notes" class="tabcontent" style="display:none;">
                                <h4>Create a note</h4>
                                <button onclick="noteAddition('bold')" class="silver">B</button>
                                <button onclick="noteAddition('italic')" class="silver"><i>I</i></button>
                                <select onchange="noteAddition('colour')" id="selectColour" onkeypress="noteAddition('colour')">
                                    <option disabled selected>Colour</option>
                                    <option value="red">Red</option>
                                    <option value="orange">Orange</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="green">Green</option>
                                    <option value="blue">Blue</option>
                                    <option value="Cyan">Cyan</option>
                                    <option value="Teal">Teal</option>
                                    <option value="purple">Purple</option>
                                    <option value="white">White</option>
                                    <option value="Gray">Grey</option>
                                </select>
                                <form id="noteForm" method="post">
                                    @csrf
                                    <textarea id="note_message" maxlength="500" rows="10" name="note_message"></textarea>
                                    <select name="note_skin">
                                        <option disabled selected>Skin</option>
                                        <option value="default_skin">Default</option>
                                        <option value="bubble_skin">Speech bubble</option>
                                        <option value="metal_skin">Metal</option>
                                        <option value="notepad_skin">Notepad</option>
                                        <option selected value="note_skin">Sticky Note</option>
                                        <option value="golden_skin">Golden</option>
                                        <option value="hcm_skin">HC Machine</option>
                                    </select>
                                    <button type="submit" name="submit">Create</button>
                                </form>
                                <script>
                                initNote();
                                </script>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div id="store_preview" class="store_preview">
                                <div class="store_preview_mask">
                                    <div class="store_image"></div>
                                </div>
                                <div class="store_controls"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="store" class="tab-pane fade">
                    <div class="row">
                        <div class="col-sm-3 webstore">
                            <div class="tab">
                                <button id="open_store_stickers" class="tablinks">Stickers</button>
                                <ul id="sticker_cat">
                                    @foreach(\App\Models\CMS\Homes_Cats::where('type','s')->orderBy('name','ASC')->get() as $row)
                                    <li onclick="openTab(event, 'cat-{{$row->id}}')">{{$row->name}}</li>
                                    @endforeach
                                </ul>
                                <button class="tablinks" onclick="openTab(event, 'cat-backgrounds')">Backgrounds</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @foreach(\App\Models\CMS\Homes_Cats::where('type','s')->get() as $row)
                            <div id="cat-{{$row->id}}" class="tabcontent" style="display:none;">
                                <div class="store_grid">
                                    @foreach(\App\Models\CMS\Homes_Catalogue::where('category',$row->id)->get() as $row)
                                    <div
                                    class="store_item"
                                    data-id="{{$row->id}}"
                                    data-name="{{$row->data}}"
                                    data-type="{{$row->type}}-store"
                                    onclick="storePreview(this)"
                                    style="background-image:url('/images/homestickers/{{$row->data}}.gif');background-repeat:no-repeat;"
                                    >
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            <div id="cat-backgrounds" class="tabcontent" style="display:none;">
                                @if($store_bgs->isEmpty())
                                You already have all the backgrounds!
                                @endif
                                <div class="store_grid">
                                    @foreach($store_bgs as $row)
                                    <div
                                    id="bg-{{$row->id}}"
                                    class="store_item"
                                    data-id="{{$row->id}}"
                                    data-name="{{$row->data}}"
                                    data-type="{{$row->type}}-store"
                                    onclick="storePreview(this)"
                                    style="background-image:url('/images/profile_backgrounds/{{$row->data}}')"
                                    >
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div id="store_preview" class="store_preview">
                                <div class="store_preview_mask">
                                    <div class="store_image">
                                        <span class="store-alert"></span>
                                    </div>
                                </div>
                                <div class="store_controls"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>