<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<div class="d-flex align-items-center flex-wrap mr-2">
			<h5 class="text-dark font-weight-bold mt-2 mb-2">Agregar nuevo</h5>
			<button class="btn btn-sm" onclick="addItem()">
				<span class="svg-icon svg-icon-primary svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
							<path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
						</g>
					</svg>
				</span>
			</button>
		</div>
	</div>
</div>
<div class="d-flex flex-column-fluid">
    <div class="container">
        <!--begin::Table-->
        <table class="table table-hover">
            <thead>
				<tr>
					<th class="text-center" scope="col">Titulo</th>
					<th class="text-center" scope="col">Info 1</th>
					<th class="text-center" scope="col">Info 2</th>
					<th class="text-center" scope="col">Info 3</th>
					<th class="text-center" scope="col">Boton</th>
					<th class="text-center" scope="col">Boton link</th>
					<th class="text-center" scope="col">Imagen principal</th>
				</tr>
			</thead>
            <tbody id="tbody-leads">
                <tr>
                    <td class="text-center align-middle">
                        <div class="form-group mb-1">
                            <textarea class="form-control" id="main_title" rows="3"><?= $main[0]['main_title'] ?></textarea>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <div class="form-group mb-1">
                            <textarea class="form-control" id="main_information1" rows="3"><?= $main[0]['main_information1'] ?></textarea>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <div class="form-group mb-1">
                            <textarea class="form-control" id="main_information2" rows="3"><?= $main[0]['main_information2'] ?></textarea>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <div class="form-group mb-1">
                            <textarea class="form-control" id="main_information3" rows="3"><?= $main[0]['main_information3'] ?></textarea>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <div class="form-group mb-1">
                            <textarea class="form-control" id="main_button" rows="3"><?= $main[0]['main_button'] ?></textarea>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <div class="form-group mb-1">
                            <textarea class="form-control" id="main_button_link" rows="3"><?= $main[0]['main_button_link'] ?></textarea>
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <div class="symbol symbol-100 symbol-light">
                            <label for="file-input<?= $main[0]['id'] ?>">
                                <span class="symbol-label">
                                    <img src="./images/site_main/<?= $main[0]['imagen'] ?>" class="img-thumbnail" alt="" />
                                </span>
                            </label>
                        </div>
                        <form id="frmImage_<?= $main[0]['id'] ?>" onsubmit="return false">
                            <input type="file" name="image" accept=".png, .jpg, .jpeg" style="display: none;" id="file-input<?= $main[0]['id'] ?>" onchange="uploadImage(<?= $main[0]['id'] ?>, 'site_main')">
                        </form>
					</td>
                   
                    <!-- Guardar -->
                    <td class=" text-center align-middle">
                        <button style="border: none; background-color: transparent;" onclick="saveItem(<?= $main[0]['id'] ?>)">
                            <span class="svg-icon svg-icon-primary svg-icon-3x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero" />
                                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5" />
                                    </g>
                                </svg>
                            </span>
                        </button>
                    </td>
                    <!-- Guardar -->
                </tr>
            </tbody>
        </table>

        <table class="table table-hover">
			<thead>
				<tr>
					<th class="text-center" scope="col">Caracteristica</th>
					<th class="text-center" scope="col">Imagen slider</th>
					<th class="text-center" scope="col">Guardar</th>
					<th class="text-center" scope="col">Eliminar</th>
				</tr>
			</thead>
			<tbody id="tbody-leads">
				<?php
				foreach ($caracteristicas as $caracteristica) { ?>
					<tr id="<?= $caracteristica['id'] ?>">
						<td class="text-center align-middle">
							<div class="form-group mb-1">
								<textarea class="form-control" id="caracteristica_<?= $caracteristica['id'] ?>" rows="3"><?= $caracteristica['caracteristica'] ?></textarea>
							</div>
						</td>
						<td class="text-center align-middle">
							<div class="symbol symbol-100 symbol-light">
								<label for="file-input<?= $caracteristica['id'] ?>">
									<span class="symbol-label">
										<img src="./images/site_main_caracteristicas/<?= $caracteristica['imagen'] ?>" class="img-thumbnail" alt="" />
									</span>
								</label>
							</div>
							<form id="frmImage_<?= $caracteristica['id'] ?>" onsubmit="return false">
								<input type="file" name="image" accept=".png, .jpg, .jpeg" style="display: none;" id="file-input<?= $caracteristica['id'] ?>" onchange="uploadImage(<?= $caracteristica['id'] ?>, 'site_main_caracteristicas')">
							</form>
						</td>

						<!-- Guardar -->
						<td class=" text-center align-middle">
                            <button style="border: none; background-color: transparent;" onclick="saveItem(<?= $caracteristica['id'] ?>)">
                                <span class="svg-icon svg-icon-primary svg-icon-3x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero" />
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5" />
                                        </g>
                                    </svg>
                                </span>
                            </button>
						</td>
						<!-- Guardar -->

						<!-- Eliminar -->
						<td class="text-center align-middle">
							<button style="border: none; background-color: transparent;" onclick="deleteItem(<?= $caracteristica['id'] ?>)">
								<span class="svg-icon svg-icon-danger svg-icon-3x">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
											<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
										</g>
									</svg>
								</span>
							</button>
						</td>
						<!-- Eliminar -->
					</tr>
				<?php } ?>
			</tbody>
		</table>

        <!--end::Table-->
        <script>
            function saveItem(id) {
                $.ajax({
                    type: 'get',
                    url: './functions/builder.php',
                    data: {
                        item_id: id,
                        main_title: $('#main_title').val(),
                        main_information1: $('#main_information1').val(),
                        main_information2: $('#main_information2').val(),
                        main_information3: $('#main_information3').val(),
                        main_information4: $('#main_information4').val(),
                        caracteristica: $('#caracteristica_' + id).val(),
                        main_button: $('#main_button').val(),
                        main_button_link: $('#main_button_link').val(),
                        function: 'save_main_text'
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }

            function uploadImage(id,table) {
				fetch(`./functions/builder.php?table=${table}&function=save_image&item_id=${id}`, {
					method: "POST",
					body: new FormData(document.getElementById('frmImage_' + id))
				}).then(function() {
					location.reload();
				})
			}

            function addItem() {
				$.ajax({
					type: 'get',
					url: './functions/builder.php',
					data: {
						function: 'add_site_main_caracteristicas_item'
					},
					success: function(response) {
						location.reload();
					}
				});
			}

            function deleteItem(id) {
				Swal.fire({
					title: "Esta a punto de eliminar un banner",
					icon: "warning",
					showCancelButton: true,
					confirmButtonText: "Eliminar",
					cancelButtonText: "Cancelar",
					reverseButtons: true
				}).then(function(result) {
					if (result.value) {
						$.ajax({
							type: 'get',
							url: './functions/builder.php',
							data: {
								item_id: id,
								function: 'delete_item',
								table : 'site_main_caracteristicas'  
							},
							success: function(response) {
								location.reload();
							}
						});
					}
				});
			}

        </script>
    </div>
</div>