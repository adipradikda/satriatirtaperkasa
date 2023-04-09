<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('date_note_model','dt');
        check_session_login();
       
    }

	public function index()
	{
		$this->load->view('administrator/charts');
	}

	public function chart_flow_inlet_outlet($tahun,$bulan){
		$bulan = sprintf('%02d', $bulan);
		$date = $tahun.'-'.$bulan.'-01';
		$max_day = date("t",strtotime($date));

		$data = $this->dt->chart_flow_inlet_outlet($tahun,$bulan);

		$labels = [];
		$inlet  = [];
		$datasets  = [];
		$arr_kecuali = ['Saturday','Sunday'];

		$inlet = [
			'label' => 'Flow Inlet',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(2,117,216,0.2)',
			'borderColor' => 'rgba(2,117,216,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(2,117,216,1)",
			'pointBorderColor' => "rgba(255,255,255,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(2,117,216,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$outlet = [
			'label' => 'Flow Outlet',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(25, 135, 84,0.2)',
			'borderColor' => 'rgba(25, 135, 84,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointBorderColor' => "rgba(25, 135, 84,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		for ($i=1; $i <= $max_day ; $i++) { 
			$now = $tahun.'-'.$bulan.'-'.sprintf('%02d', $i);
			$day = date("l",strtotime($now));

			if(!in_array($day,$arr_kecuali)){
				$labels[] = $i.' '.arr_bulan()[(int) $bulan];

				$key = array_search($now, array_column($data, 'tanggal'));
				if(strlen($key)>0){
					$detail = $data[$key];
					$inlet['data'][] = $detail->inlet;
					$outlet['data'][] = $detail->outlet;
				}else{
					$inlet['data'][] = 0;
					$outlet['data'][] = 0;
				}
			}
		}

		$response = [
			'labels' => $labels,
			'datasets' => [$inlet,$outlet]
		];
		debug_json($response);
	}

	public function chart_inlet_outlet($tahun,$bulan){
		$bulan = sprintf('%02d', $bulan);
		$date = $tahun.'-'.$bulan.'-01';
		$max_day = date("t",strtotime($date));

		$data = $this->dt->chart_inlet_outlet($tahun,$bulan);

		$labels = [];
		$inlet  = [];
		$datasets  = [];
		$arr_kecuali = ['Saturday','Sunday'];

		$eq = [
			'label' => 'pH Equals',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(2,117,216,0.2)',
			'borderColor' => 'rgba(2,117,216,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(2,117,216,1)",
			'pointBorderColor' => "rgba(255,255,255,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(2,117,216,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$eq2 = [
			'label' => 'TDS Equals',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(25, 135, 84,0.2)',
			'borderColor' => 'rgba(25, 135, 84,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointBorderColor' => "rgba(25, 135, 84,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$daff = [
			'label' => 'pH Daff',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(220, 53, 69,0.2)',
			'borderColor' => 'rgba(220, 53, 69,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointBorderColor' => "rgba(220, 53, 69,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$daff2 = [
			'label' => 'TDS DAff',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(255, 193, 7,0.2)',
			'borderColor' => 'rgba(255, 193, 7,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(255, 193, 7,1)",
			'pointBorderColor' => "rgba(255, 193, 7,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(255, 193, 7,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		for ($i=1; $i <= $max_day ; $i++) { 
			$now = $tahun.'-'.$bulan.'-'.sprintf('%02d', $i);
			$day = date("l",strtotime($now));

			if(!in_array($day,$arr_kecuali)){
				$labels[] = $i.' '.arr_bulan()[(int) $bulan];

				$key = array_search($now, array_column($data, 'tanggal'));
				if(strlen($key)>0){
					$detail = $data[$key];
					$eq['data'][] = $detail->ph_eq;
					$eq2['data'][] = $detail->tds_eq;
					$daff['data'][] = $detail->ph_daf;
					$daff2['data'][] = $detail->tds_daf;
				}else{
					$eq['data'][] = 0;
					$eq2['data'][] = 0;
					$daff['data'][] = 0;
					$daff2['data'][] = 0;
				}
			}
		}

		$response = [
			'labels' => $labels,
			'datasets' => [$eq,$eq2,$daff,$daff2]
		];
		debug_json($response);
	}

	public function chart_chemical($tahun,$bulan){
		$bulan = sprintf('%02d', $bulan);
		$date = $tahun.'-'.$bulan.'-01';
		$max_day = date("t",strtotime($date));

		$data = $this->dt->chart_chemical($tahun,$bulan);

		$labels = [];
		$inlet  = [];
		$datasets  = [];
		$arr_kecuali = ['Saturday','Sunday'];

		$fecl3 = [
			'label' => 'fecl3',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(2,117,216,0.2)',
			'borderColor' => 'rgba(2,117,216,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(2,117,216,1)",
			'pointBorderColor' => "rgba(255,255,255,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(2,117,216,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$anion = [
			'label' => 'anion',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(25, 135, 84,0.2)',
			'borderColor' => 'rgba(25, 135, 84,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointBorderColor' => "rgba(25, 135, 84,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$cation = [
			'label' => 'cation',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(220, 53, 69,0.2)',
			'borderColor' => 'rgba(220, 53, 69,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointBorderColor' => "rgba(220, 53, 69,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$coustik = [
			'label' => 'coustik',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(255, 193, 7,0.2)',
			'borderColor' => 'rgba(255, 193, 7,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(255, 193, 7,1)",
			'pointBorderColor' => "rgba(255, 193, 7,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(255, 193, 7,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$bakteri = [
			'label' => 'bakteri',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(220, 53, 69,0.2)',
			'borderColor' => 'rgba(220, 53, 69,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointBorderColor' => "rgba(220, 53, 69,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$antifoam = [
			'label' => 'antifoam',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(255, 193, 7,0.2)',
			'borderColor' => 'rgba(255, 193, 7,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(255, 193, 7,1)",
			'pointBorderColor' => "rgba(255, 193, 7,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(255, 193, 7,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		for ($i=1; $i <= $max_day ; $i++) { 
			$now = $tahun.'-'.$bulan.'-'.sprintf('%02d', $i);
			$day = date("l",strtotime($now));

			if(!in_array($day,$arr_kecuali)){
				$labels[] = $i.' '.arr_bulan()[(int) $bulan];

				$key = array_search($now, array_column($data, 'tanggal'));
				if(strlen($key)>0){
					$detail = $data[$key];
					$fecl3['data'][] = $detail->fecl3;
					$anion['data'][] = $detail->anion;
					$cation['data'][] = $detail->cation;
					$coustik['data'][] = $detail->coustik;
					$bakteri['data'][] = $detail->bakteri;
					$antifoam['data'][] = $detail->antifoam;
				}else{
					$fecl3['data'][] = 0;
					$anion['data'][] = 0;
					$cation['data'][] = 0;
					$coustik['data'][] = 0;
					$bakteri['data'][] = 0;
					$antifoam['data'][] = 0;
				}
			}
		}

		$response = [
			'labels' => $labels,
			'datasets' => [$fecl3,$anion,$cation,$coustik,$bakteri,$antifoam]
		];
		debug_json($response);
	}

	public function chart_mbbr($tahun,$bulan){
		$bulan = sprintf('%02d', $bulan);
		$date = $tahun.'-'.$bulan.'-01';
		$max_day = date("t",strtotime($date));

		$data = $this->dt->chart_mbbr($tahun,$bulan);

		$labels = [];
		$inlet  = [];
		$datasets  = [];
		$arr_kecuali = ['Saturday','Sunday'];

		$ph = [
			'label' => 'ph',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(2,117,216,0.2)',
			'borderColor' => 'rgba(2,117,216,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(2,117,216,1)",
			'pointBorderColor' => "rgba(255,255,255,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(2,117,216,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$tds = [
			'label' => 'tds',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(25, 135, 84,0.2)',
			'borderColor' => 'rgba(25, 135, 84,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointBorderColor' => "rgba(25, 135, 84,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$sv30 = [
			'label' => 'sv30',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(220, 53, 69,0.2)',
			'borderColor' => 'rgba(220, 53, 69,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointBorderColor' => "rgba(220, 53, 69,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];


		for ($i=1; $i <= $max_day ; $i++) { 
			$now = $tahun.'-'.$bulan.'-'.sprintf('%02d', $i);
			$day = date("l",strtotime($now));

			if(!in_array($day,$arr_kecuali)){
				$labels[] = $i.' '.arr_bulan()[(int) $bulan];

				$key = array_search($now, array_column($data, 'tanggal'));
				if(strlen($key)>0){
					$detail = $data[$key];
					$ph['data'][] = $detail->ph;
					$tds['data'][] = $detail->tds;
					$sv30['data'][] = $detail->sv_30;
			
				}else{
					$ph['data'][] = 0;
					$tds['data'][] = 0;
					$sv30['data'][] = 0;
				}
			}
		}

		$response = [
			'labels' => $labels,
			'datasets' => [$ph,$tds,$sv30]
		];
		debug_json($response);
	}

	public function chart_hos($tahun,$bulan){
		$bulan = sprintf('%02d', $bulan);
		$date = $tahun.'-'.$bulan.'-01';
		$max_day = date("t",strtotime($date));

		$data = $this->dt->chart_hos($tahun,$bulan);

		$labels = [];
		$inlet  = [];
		$datasets  = [];
		$arr_kecuali = ['Saturday','Sunday'];

		$stok = [
			'label' => 'Stok Karung',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(2,117,216,0.2)',
			'borderColor' => 'rgba(2,117,216,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(2,117,216,1)",
			'pointBorderColor' => "rgba(255,255,255,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(2,117,216,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$karung = [
			'label' => 'Karung Sak',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(25, 135, 84,0.2)',
			'borderColor' => 'rgba(25, 135, 84,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointBorderColor' => "rgba(25, 135, 84,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$jumbo = [
			'label' => 'Jumbo Bag',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(220, 53, 69,0.2)',
			'borderColor' => 'rgba(220, 53, 69,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointBorderColor' => "rgba(220, 53, 69,0.8)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];


		for ($i=1; $i <= $max_day ; $i++) { 
			$now = $tahun.'-'.$bulan.'-'.sprintf('%02d', $i);
			$day = date("l",strtotime($now));

			if(!in_array($day,$arr_kecuali)){
				$labels[] = $i.' '.arr_bulan()[(int) $bulan];

				$key = array_search($now, array_column($data, 'tanggal'));
				if(strlen($key)>0){
					$detail = $data[$key];
					$stok['data'][] = $detail->stok_karung;
					$karung['data'][] = $detail->karung_sak;
					$jumbo['data'][] = $detail->jumbo_bag;
			
				}else{
					$stok['data'][] = 0;
					$karung['data'][] = 0;
					$jumbo['data'][] = 0;
				}
			}
		}

		$response = [
			'labels' => $labels,
			'datasets' => [$stok,$karung,$jumbo]
		];
		debug_json($response);
	}

	public function chart_bls($tahun,$bulan){
		$bulan = sprintf('%02d', $bulan);
		$date = $tahun.'-'.$bulan.'-01';
		$max_day = date("t",strtotime($date));

		$data = $this->dt->chart_bls($tahun,$bulan);

		$labels = [];
		$inlet  = [];
		$datasets  = [];
		$arr_kecuali = ['Saturday','Sunday'];

		$aml = [
			'label' => 'Angkut Mobil Limbah',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(2,117,216,1)',
			'borderColor' => 'rgba(2,117,216,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(2,117,216,1)",
			'pointBorderColor' => "rgba(255,255,255,1)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(2,117,216,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$saos = [
			'label' => 'Saos',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(25, 135, 84,1)',
			'borderColor' => 'rgba(25, 135, 84,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointBorderColor' => "rgba(25, 135, 84,1)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$mayones = [
			'label' => 'Mayones',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(220, 53, 69,1)',
			'borderColor' => 'rgba(220, 53, 69,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointBorderColor' => "rgba(220, 53, 69,1)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$keju = [
			'label' => 'Keju',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(25, 135, 84,1)',
			'borderColor' => 'rgba(25, 135, 84,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointBorderColor' => "rgba(25, 135, 84,1)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(25, 135, 84,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];

		$ibc = [
			'label' => 'IBC',
			'lineTension' => 0.3,
			'backgroundColor' => 'rgba(220, 53, 69,1)',
			'borderColor' => 'rgba(220, 53, 69,1)',
			'pointRadius' => 5,
			'pointBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointBorderColor' => "rgba(220, 53, 69,1)",
			'pointHoverRadius' => 5,
			'pointHoverBackgroundColor' => "rgba(220, 53, 69,1)",
			'pointHitRadius' => 50,
			'pointBorderWidth' => 2,
			'data' => [],
		];


		for ($i=1; $i <= $max_day ; $i++) { 
			$now = $tahun.'-'.$bulan.'-'.sprintf('%02d', $i);
			$day = date("l",strtotime($now));

			if(!in_array($day,$arr_kecuali)){
				$labels[] = $i.' '.arr_bulan()[(int) $bulan];

				$key = array_search($now, array_column($data, 'tanggal'));
				if(strlen($key)>0){
					$detail = $data[$key];
					$aml['data'][] = $detail->angkut_mobil_limbah;
					$saos['data'][] = $detail->saos;
					$mayones['data'][] = $detail->mayones;
					$keju['data'][] = $detail->keju;
					$ibc['data'][] = $detail->ibc;
			
				}else{
					$aml['data'][] = 0;
					$saos['data'][] = 0;
					$mayones['data'][] = 0;
					$keju['data'][] = 0;
					$ibc['data'][] = 0;
				}
			}
		}

		$response = [
			'labels' => $labels,
			'datasets' => [$aml,$saos,$mayones,$keju,$ibc]
		];
		debug_json($response);
	}
}