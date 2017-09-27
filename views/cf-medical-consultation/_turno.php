<div class="cf-turno-view">
    <div class="widget-box">
        <div class="widget-header">
            <h5 class="widget-title">
                <i class="fa fa-caret-square-o-right"></i>
                <u>No Turno:</u> <span class='text-warning'><?= $model->id ?></span>
                <u>Estudio:</u> <span class='text-warning'><?= $model->cfMedicalStudy->name; ?></span>
                <br>
                <i class="fa fa-male"></i>
                <u>Paciente:</u> <span class='text-warning'><?= $model->cfPatient->fullname; ?></span>
                <u> CI: </u> <span class='text-warning'><?= $model->cfPatient->personal_id; ?></span>
            </h5>
        </div>
        <div class="widget-body">
            <div class="widget-main">
                <table class="table table-striped table-bordered detail-view"><tbody><tr>
                    <tr>
                        <td><b>Fecha del turno:</b> <?= $model->date_turn ?> </td>
                        <td><b>Hora del turno:</b> <?= $model->hour_turn ?> </td>
                        <td><b>Fuera de calendario:</b> <?= $model->off_calendar ?></td>
                    </tr>
                    <tr>
                        <td><b>Fecha de remision:</b> <?= $model->date_remission; ?></td>
                        <td><b>Es externo (Estado de Remision):</b> <?= $model->is_external ?> </td>
                        <td><b>Causas:</b> <?= $model->causes ?></td>
                    </tr>
                    <tr>
                        <td><b>Doctor que remite:</b> <?= $model->doctor_makes_referral_name; ?> </td>
                        <td><b>Correo del doctor que remite:</b> <?= $model->doctor_makes_referral_email;?> </td>
                        <td><b>Hospital:</b> <?= $model->hospital_makes_referral_name; ?>  </td>
                    </tr>
                    <tr>
                        <td><b>Edad:</b> <?= $model->age ?></td>
                        <td><b>Talla (cm):</b> <?= $model->size ?> cm</td>
                        <td><b>Peso (kg):</b> <?= $model->weight ?> kg</td>
                    </tr>
                    <tr>
                        <td><b>Especialista que recibe:</b> <?= $model->especialista->nombreCompleto ; ?></td>
                        <td><b>Estado Turno</b>:<label class="label label-info"><?= $model->status ?> </label></td>
                        <td><b>Precio del Estudio ($):</b> <?= $model->price ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Indicaciones:</b> <?= $model->indication; ?></td>
                        <td><b>Observacion:</b> <?= $model->observation ; ?> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
