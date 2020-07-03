package com.example.futsalbismillah;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.futsalbismillah.adapter.Adapter_Futsal;
import com.example.futsalbismillah.model.FutsalModel;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class ListFutsal extends AppCompatActivity {
    ListView listView;
    Button kembali;
//    SimpleAdapter adapter;
    HashMap<String, Object> map;
    ArrayList<HashMap<String, Object>> mylist;
    String[] jdl;
    String[] ktr;
    int[] img;
    private Adapter_Futsal adapter;
    private List<FutsalModel> list;
    private RecyclerView listdata;
    RecyclerView.LayoutManager mManager;
    ProgressDialog pd;
    @Override
    protected void onCreate(Bundle saveInstanceState) {
        super.onCreate(saveInstanceState);
        setContentView(R.layout.activity_main_listfutsal);
        listdata = (RecyclerView) findViewById(R.id.listdata);
        listdata.setHasFixedSize(true);
        list = new ArrayList<>();
        adapter = new Adapter_Futsal(this,(ArrayList<FutsalModel>) list, this);
        mManager = new LinearLayoutManager(this,LinearLayoutManager.VERTICAL,false);
        listdata.setLayoutManager(mManager);
        listdata.setAdapter(adapter);
        pd = new ProgressDialog(this);
        loadJson();
    }
    private void loadJson()
    {
        StringRequest senddata = new StringRequest(Request.Method.GET, "http://192.168.1.68/Kelompok2/api/futsal", new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONArray res = null;
                try {
                    res = new JSONArray(response);
                    if(res.length() > 0) {
                        for (int i = 0; i < res.length(); i++) {
                            try {
                                JSONObject data = res.getJSONObject(i);
                                FutsalModel md = new FutsalModel();
                                md.setKode(data.getString("id_futsal"));
                                md.setNama_futsal(data.getString("nama_futsal"));
                                md.setAlamat(data.getString("alamat_futsal"));
                                md.setTelp(data.getString("telp_futsal"));
                                list.add(md);
                            } catch (Exception ea) {
                                ea.printStackTrace();
                                Log.d("pesan", ea.getMessage());
                            }
                        }
                        adapter.notifyDataSetChanged();
                    }else{
                        Toast.makeText(ListFutsal.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    Toast.makeText(ListFutsal.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                    Log.d("pesan", "error "+e.getMessage());
                    e.printStackTrace();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(ListFutsal.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                        Log.d("volley", "errornya : " + error.getMessage());
                    }
                });
        AppController.getInstance().addToRequestQueue(senddata);
    }
}