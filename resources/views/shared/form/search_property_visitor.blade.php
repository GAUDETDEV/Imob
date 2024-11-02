<div class="tabs-content wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
    <div class="tab" id="tab-1">
        <div class="inner-box">
            <div class="property__form">
            <form action="{{ route('visitor.all.properties.index') }}" method="GET" class="reserve-form">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class=" form-group">
                            <div class="top__title">
                                <div class="icon">
                                    <span class="icon-icon-44"></span>
                                </div>
                                <label>Prix</label>
                            </div>
                            <input type="number" class="form-control" name="prix_min" value="{{ request('prix_min') }}" placeholder="Minimum ">
                        </div>
                    </div>
                    <div class="col">
                        <div class=" form-group">
                            <div class="top__title">
                                <div class="icon">
                                    <span class="icon-icon-44"></span>
                                </div>
                                <label>Prix</label>
                            </div>
                            <input type="number" class="form-control" name="prix_max" value="{{ request('prix_max') }}" placeholder="Maximum ">
                        </div>
                    </div>
                    <div class="col">
                        <div class=" form-group">
                            <div class="top__title">
                                <div class="icon">
                                    <span class="icon-icon-44"></span>
                                </div>
                                <label>Surface Maximale</label>
                            </div>
                            <input type="number" class="form-control" name="surface_max" value="{{ request('surface_max') }}" placeholder="Maximale ">
                        </div>
                    </div>
                    <div class="col">
                        <div class=" form-group">
                            <div class="top__title">
                                <div class="icon">
                                    <span class="icon-icon-44"></span>
                                </div>
                                <label>Surface Minimale</label>
                            </div>
                            <input type="number" class="form-control" name="surface_min" value="{{ request('surface_min') }}" placeholder="Minimale ">
                        </div>
                    </div>
                    <div class="col">
                        <div class=" form-group">
                            <div class="top__title">
                                <div class="icon">
                                    <span class="icon-icon-44"></span>
                                </div>
                                <label>Mot clé</label>
                            </div>
                            <input type="text" class="form-control" name="type" value="{{ request('type') }}" placeholder="Type ">
                        </div>
                    </div>
                    <div class="col">
                        <div class=" form-group message-btn centred">
                            <button type="submit" class="theme-btn-one"><span class="icon-57"></span></button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>










