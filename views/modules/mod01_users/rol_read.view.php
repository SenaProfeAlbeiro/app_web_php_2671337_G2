		<div class="container-fluid">
			<ul class="full-box list-unstyled page-nav-tabs">
				<li>
					<a href="user-new.html"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO ROL</a>
				</li>
				<li>
					<a class="active" href="user-list.html"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ROLES</a>
				</li>
				<li>
					<a href="user-search.html"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ROL</a>
				</li>
			</ul>
		</div>

		<!-- Content -->
		<div class="container-fluid">
			<div class="table-responsive">
				<table class="table table-dark table-sm">
					<thead>
						<tr class="text-center roboto-medium">
							<th>Código</th>
							<th>Nombre Rol</th>
							<th>ACTUALIZAR</th>
							<th>ELIMINAR</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($roles as $rol) : ?>
							<tr class="text-center">
								<td><?php echo $rol->getRolCode(); ?></td>
								<th><?php echo $rol->getRolName(); ?></th>
								<td>
									<a href="?c=Roles&a=updateRol&idRol=<?php echo $rol->getRolCode(); ?>" class="btn btn-success">
										<i class="fas fa-sync-alt"></i>
									</a>
								</td>
								<td>
									<a href="?c=Roles&a=deleteRol&idRol=<?php echo $rol->getRolCode(); ?>" class="btn btn-warning">
										<i class="far fa-trash-alt"></i>
									</a>
								</td>								
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav>
		</div>

		</section>
		</main>