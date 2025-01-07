
<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title color-primary" id="responseModalLabel"></h5>
                <button type="button" class="btn-close color-primary border-0 noborder" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center p-1">
                    <form>
                        <div class="row g-3">
                            {{-- @auth --}}

                            <!--  Start Notifications  -->

                            @if(session('errors'))
                                {{-- if app debug enable --}}
                                @if (config('app.debug'))
                                    <div class="col-md-12">
                                        <div class="false mb-4">
                                            <p class="msg-false">{{session('errors')}}<i
                                                    class="fas fa-times mr-2"></i> </p>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <div class="false mb-4">
                                        <p class="msg-false">حدث خطأ ما ، حاول مرة ثانية ! <i
                                                class="fas fa-times mr-2"></i> </p>
                                    </div>
                                </div>

                            @elseif (session('success'))
                                <div class="col-md-12">
                                    <div class="success mb-4">
                                        <p class="msg-success">تم إرسال الطلب
                                            بنجاح <i class="fas fa-check mr-2"></i></p>
                                    </div>
                                </div>
                            @endif

                            <!--  End Notifications  -->

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
