<div class="row" xmlns="http://www.w3.org/1999/html">
            <div id="availability">
                <div class="a-col alternate">
                    <div class="input-field">
                        <label>Buscar por Nombre</label>
                        <input type="text" v-model="searchQuery" class="form-control">
                    </div>
                </div>
                <div class="a-col alternate">
                    <div class="input-field">
                        <label for="date-start">Filtrar Fecha de Inicio</label>
                        <input type="text" v-model="searchStartDate" class="form-control form_datetime">
                    </div>
                </div>
                <div class="a-col">
                    <button class="btn btn-default" @click="order = order * -1">
                        Precio <span class="@{{ order == 1 ? 'fa fa-angle-up' : 'fa fa-angle-down' }}"></span>
                    </button>
                </div>
            </div>
        </div>

