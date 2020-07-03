package com.example.futsalbismillah;


import android.app.DatePickerDialog;
import android.content.Intent;
import android.os.Bundle;


import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import androidx.appcompat.app.AppCompatActivity;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Locale;
import java.util.Map;

/**
 * Created by Herdi_WORK on 20.01.17.
 */

public class Booking extends AppCompatActivity {

    private DatePickerDialog datePickerDialog;
    private SimpleDateFormat dateFormatter, dateFormatter1;
    private TextView tvDateResult;
    private Button btDatePicker;
    String tanggal = "";
    Button caribooking;
    Spinner sp_name, sp_jam;

    @Override
    protected void onCreate( Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_booking);

        /**
         * Kita menggunakan format tanggal dd-MM-yyyy
         * jadi nanti tanggal nya akan diformat menjadi
         * misalnya 01-12-2017
         */
        dateFormatter = new SimpleDateFormat("dd-MM-yyyy", Locale.US);
        dateFormatter1 = new SimpleDateFormat("yyyy-MM-dd", Locale.US);

        tvDateResult = (TextView) findViewById(R.id.tv_dateresult);
        btDatePicker = (Button) findViewById(R.id.bt_datepicker);
        btDatePicker.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                showDateDialog();
            }
        });
        sp_name = findViewById(R.id.sp_name);
        sp_jam = findViewById(R.id.sp_jam);
        caribooking = findViewById(R.id.caribooking);
        caribooking.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pesan();
            }
        });
    }

    private void showDateDialog(){

        /**
         * Calendar untuk mendapatkan tanggal sekarang
         */
        Calendar newCalendar = Calendar.getInstance();

        /**
         * Initiate DatePicker dialog
         */
        datePickerDialog = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener() {

            @Override
            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {

                /**
                 * Method ini dipanggil saat kita selesai memilih tanggal di DatePicker
                 */

                /**
                 * Set Calendar untuk menampung tanggal yang dipilih
                 */
                Calendar newDate = Calendar.getInstance();
                newDate.set(year, monthOfYear, dayOfMonth);

                /**
                 * Update TextView dengan tanggal yang kita pilih
                 */
                tvDateResult.setText("Tanggal dipilih : "+dateFormatter.format(newDate.getTime()));
                tanggal = dateFormatter1.format(newDate.getTime());
            }

        },newCalendar.get(Calendar.YEAR), newCalendar.get(Calendar.MONTH), newCalendar.get(Calendar.DAY_OF_MONTH));

        /**
         * Tampilkan DatePicker dialog
         */
        datePickerDialog.show();
    }
    public void pesan(){
        Intent halaman = new Intent(getBaseContext(), Tersedia.class);
        Intent data = getIntent();
//        final String tgl = tanggal;
        halaman.putExtra("id_futsal",  data.getStringExtra("kode"));
        halaman.putExtra("id_lapangan","1");
        halaman.putExtra("tanggal", tanggal);
        halaman.putExtra("waktu_mulai", sp_jam.getSelectedItem().toString());
        halaman.putExtra("durasi", sp_name.getSelectedItem().toString());
        startActivity(halaman);
//        StringRequest senddata = new StringRequest(Request.Method.POST, "http://192.168.1.68/Kelompok2/api/lapangan", new Response.Listener<String>() {
//            @Override
//            public void onResponse(String response) {
//                //                    JSONObject res = new JSONObject(response);
//
//                if(response.equals("")){
//                    Toast.makeText(Booking.this,
//                            "Futsal Tersedia", Toast.LENGTH_SHORT)
//                            .show();
//
//                }else{
//                    Toast.makeText(getBaseContext(),response, Toast.LENGTH_SHORT).show();
//
//                }
//
//            }
//        }, new Response.ErrorListener() {
//            @Override
//            public void onErrorResponse(VolleyError error) {
//
//                Log.e("errornyaa ", "" + error);
//                Toast.makeText(getBaseContext(), "Gagal Login, "+error, Toast.LENGTH_SHORT).show();
//
//
//            }
//        }){
//            @Override
//            protected Map<String, String> getParams() throws AuthFailureError {
//                Map<String, String> params = new HashMap<>();
//                Intent data = getIntent();
//                params.put("id_futsal", data.getStringExtra("kode"));
//                params.put("id_lapangan", "2");
//                params.put("tanggal", tgl);
//                params.put("waktu_mulai", sp_jam.getSelectedItem().toString());
//                params.put("durasi", sp_name.getSelectedItem().toString());
//
//                return params;
//            }
//        };
//        AppController.getInstance().addToRequestQueue(senddata);
    }
}
