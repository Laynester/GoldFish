@extends('installation.layouts.installation-layout')

@section('step', '4')

@section('content')
    <div class="row px-3">
        <div class="col-lg-6">
            <div class="box grey">
                <p>
                    {{ __('This is your hotels configuration, here you can set your swf directories, swf location and other requirements.') }}
                </p>

                <p>
                    <strong class="text-uppercase">{{ __('Note:') }}</strong> {{ __('Always remember all of this data can be later edited through the housekeeping, or the hotel housekeeping.') }}
                </p>
            </div>
        </div>

        <div class="col-lg-6">
            <form method="post">
                @csrf

                <div class="box">
                    <h2>{{ __('Hotel Configuration') }}</h2>

                    <div class="form-group">
                        <label>{{ __('Emulator Host:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="emuhost"
                               placeholder="{{ __('Enter your emulator host') }}"
                               value="{{ CMSHelper::settings('emuhost') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Emulator port:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="emuport"
                               placeholder="{{ __('Enter your emulator port') }}"
                               value="{{ CMSHelper::settings('emuport') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('RCON IP:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="rconip"
                               placeholder="{{ __('Enter your RCON IP') }}"
                               value="{{ CMSHelper::settings('rconip') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('RCON Port:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="rconport"
                               placeholder="{{ __('Enter your RCON port') }}"
                               value="{{ CMSHelper::settings('rconport') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('SWF Directory:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="swfdir"
                               placeholder="{{ __('Enter your SWF directory path') }}"
                               value="{{ CMSHelper::settings('swfdir') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Client SWF:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="swf"
                               placeholder="{{ __('Enter your path to your game SWF - eg. Habbo.swf') }}"
                               value="{{ CMSHelper::settings('swf') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('External Variables') }}</label>
                        <input class="inputs"
                               type="text"
                               name="variables"
                               placeholder="{{ __('Enter your path to your external_variable.txt') }}"
                               value="{{ CMSHelper::settings('variables') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('External Override Variables:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="override_variables"
                               placeholder="{{ __('Enter your path to your external_override_variable.txt') }}"
                               value="{{ CMSHelper::settings('override_variables') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('External Flash Texts:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="texts"
                               placeholder="{{ __('Enter your path to your external_flash_texts.txt') }}"
                               value="{{ CMSHelper::settings('texts') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('External Flash Override Texts:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="override_texts"
                               placeholder="{{ __('Enter your path to your external_flash_override_texts.txt') }}"
                               value="{{ CMSHelper::settings('override_texts') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Productdata:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="productdata"
                               placeholder="{{ __('Enter your path to your productdata.txt') }}"
                               value="{{ CMSHelper::settings('productdata') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Furnidata:') }}</label>
                        <input class="inputs"
                               type="text"
                               name="furnidata"
                               placeholder="{{ __('Enter your path to your furnidata.xml') }}"
                               value="{{ CMSHelper::settings('furnidata') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Figuremap') }}</label>
                        <input class="inputs"
                               type="text"
                               name="figuremap"
                               placeholder="{{ __('Enter your path to your figuremap.xml') }}"
                               value="{{ CMSHelper::settings('figuremap') }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Figuredata') }}</label>
                        <input class="inputs"
                               type="text"
                               name="figuredata"
                               placeholder="{{ __('Enter your path to your figuredata.xml') }}"
                               value="{{ CMSHelper::settings('figuredata') }}">
                    </div>
                </div>

                <span class="controls">
                    <button class="green" type="submit">{{ __('Continue') }}</button>
                    <a class="red" href="{{ route('installation.step', 3) }}">{{ __('Back') }}</a>
                </span>
            </form>
        </div>
    </div>
@endsection
