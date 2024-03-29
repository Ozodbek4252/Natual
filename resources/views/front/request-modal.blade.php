<div id="modal-form" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" id="close-modal" class="close">
                <svg width="71" height="71" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="36" cy="35" r="23.5" transform="rotate(-180 36 35)" stroke="white" />
                    <path d="M30.5 47L42 35.5L30.5 24" stroke="white" stroke-width="2" stroke-linecap="round" />
                    <circle cx="35.5" cy="35.5" r="35" transform="rotate(-180 35.5 35.5)" stroke="white"
                        stroke-opacity="0.8" stroke-dasharray="5 5" />
                </svg>
            </button>

            <h2>{{ __('front.modal.Обратный звонок') }}</h2>
            <p>{{ __('front.modal.Оставьте заявку, наш оператор свяжется с вами') }} </p>

            <form action="{{ Route('front.request.send') }}" method="POST">
                @csrf
                <div class="form-control mb-8">
                    <label class="text-center text-green text-xl font-light mb-1 block"
                        for="fio">{{ __('front.modal.ФИО') }}</label>
                    <input required name="name"
                        class="text-xl font-light text-black outline-none rounded-none
                            bg-transparent block w-full border-b border-solid
                            border-green text-center py-3 px-8"
                        id="fio" type="text">
                </div>

                <div class="form-control mb-8">
                    <label class="text-center text-green text-xl font-light mb-1 block"
                        for="phone-number">{{ __('front.modal.Телефон') }}</label>
                    <input required name="number"
                        class="text-xl font-light text-black outline-none rounded-none
                            bg-transparent block w-full border-b border-solid
                            border-green text-center py-3 px-8"
                        id="phone-number" type="tel">
                </div>

                <p class="text-base text-black opacity-80 font-light my-8 text-center">
                    {{ __('front.modal.request-model-description') }}
                </p>

                <div class="flex justify-center items-center">
                    <button type="submit" class="btn btn-green btn-medium">{{ __('front.modal.Отправить') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
