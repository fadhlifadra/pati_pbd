<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotifEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\tLaporanMonitoring;
use App\tRekomendasi;
use App\tTemuanAudit;
use App\tTindakLanjut;
use App\tTindakLanjutAuditee;
use App\tActionPlan;
use App\User;
use App\DataTables\Laporan\LaporanMonitoringDataTable;
use App\DataTables\Laporan\tTemuanAuditDataTable;
use App\DataTables\tTrainingEmployeeDataTable;
use App\mObjAudit;
use App\mBagUnit;
use Excel;
use Session;
use Auth;
use App\DataTables\Laporan\tTindakLanjutAuditeeDataTable;
use App\tRiwayatNotifEmail;
use Carbon;
use App\DataTables\Laporan\tTindakLanjutDataTable;


class NotifEmailController extends Controller
{
    public function index($tla_id){
		//$t_follow = tTindakLanjut::with('tindak_lanjut_auditee')->find($tla_id);
		
        //sini
        $t_tla = tTindakLanjutAuditee::with('action_plan')->find($tla_id);
        
		return redirect()->route('index.tindak_lanjut_auditee', [$t_act->id]);
	}
}
