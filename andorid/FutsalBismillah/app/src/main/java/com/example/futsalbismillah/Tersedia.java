package com.example.futsalbismillah;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.futsalbismillah.adapter.Adapter_Futsal;
import com.example.futsalbismillah.adapter.Adapter_Lapangan;
import com.example.futsalbismillah.model.FutsalModel;
import com.example.futsalbismillah.model.Lapangan_Model;
import com.google.gson.JsonArray;
import com.google.gson.JsonObject;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class Tersedia extends AppCompatActivity {
    private Adapter_Lapangan adapter;
    private List<Lapangan_Model> list;
    private RecyclerView listdata;
    RecyclerView.LayoutManager mManager;
    ProgressDialog pd;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tersedia);
        listdata = (RecyclerView) findViewById(R.id.listdata);
        listdata.setHasFixedSize(true);
        list = new ArrayList<>();
        adapter = new Adapter_Lapangan(this,(ArrayList<Lapangan_Model>) list, this);
        mManager = new LinearLayoutManager(this,LinearLayoutManager.VERTICAL,false);
        listdata.setLayoutManager(mManager);
        listdata.setAdapter(adapter);
        pd = new ProgressDialog(this);
        loadJson();
    }
    private void loadJson()
    {
        StringRequest senddata = new StringRequest(Request.Method.POST, "http://192.168.1.68/Kelompok2/api/lapangan", new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONArray res = null;
                try {
                    res = new JSONArray(response);
                    if(res.length() > 0) {
                        for (int i = 0; i < res.length(); i++) {
                            try {
                                JSONObject data = res.getJSONObject(i);
                                Lapangan_Model md = new Lapangan_Model();
                                JSONObject d = data.getJSONObject("data");
                                md.setKode(d.getString("id_lapangan"));
                                md.setId_futsal(d.getString("id_futsal"));
                                md.setNama_lapangan(d.getString("nama_lapangan"));
                                md.setHarga_lapangan(d.getString("harga_lapangan"));
                                md.setFoto(d.getString("foto_lapangan"));
                                md.setStatus(data.getString("status"));
                                Intent dd = getIntent();
                                md.setTanggal(dd.getStringExtra("tanggal"));
                                md.setWaktu_mulai(dd.getStringExtra("waktu_mulai").replace(".", ":"));
                                md.setDurasi(dd.getStringExtra("durasi").replace(" Jam", ""));
                                list.add(md);
                            } catch (Exception ea) {
                                ea.printStackTrace();
                                Log.d("pesan", ea.getMessage());
                            }
                        }
                        adapter.notifyDataSetChanged();
                    }else{
                        Toast.makeText(Tersedia.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    Toast.makeText(Tersedia.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                    Log.d("pesan", "error "+e.getMessage());
                    e.printStackTrace();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(Tersedia.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                        Log.d("volley", "errornya : " + error.getMessage());
                    }
                }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                Intent data = getIntent();
                params.put("id_futsal", data.getStringExtra("id_futsal"));
                params.put("id_lapangan", data.getStringExtra("id_lapangan"));
                params.put("tanggal", data.getStringExtra("tanggal"));
                params.put("waktu_mulai", data.getStringExtra("waktu_mulai").replace(".", ":"));
                params.put("durasi", data.getStringExtra("durasi").replace(" Jam", ""));

                Log.d("id_futsal", data.getStringExtra("id_futsal"));
                Log.d("id_lapangan", data.getStringExtra("id_lapangan"));
                Log.d("tanggal", data.getStringExtra("tanggal"));
                Log.d("waktu_mulai", data.getStringExtra("waktu_mulai").replace(".", ":"));
                Log.d("durasi", data.getStringExtra("durasi").replace(" Jam", ""));

                return params;
            }
        };;
        AppController.getInstance().addToRequestQueue(senddata);
    }
}
