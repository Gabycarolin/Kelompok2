package com.example.futsalbismillah;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ListView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;

public class tiketawalActivity extends Fragment{
    TextView status, namafutsal, kodebooking, lapangankeberapa, tanggal, jambooking, harga;
    RelativeLayout found;
    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.activity_etiketawal, container, false);
        status = v.findViewById(R.id.status);
        namafutsal = v.findViewById(R.id.namafutsal);
        kodebooking = v.findViewById(R.id.kodebooking);
        lapangankeberapa = v.findViewById(R.id.lapangankeberapa);
        tanggal = v.findViewById(R.id.tanggal);
        jambooking = v.findViewById(R.id.jambooking);
        harga = v.findViewById(R.id.harga);
        found = v.findViewById(R.id.found);
        loadJson();
        return v;
    }
    public void loadJson(){
        StringRequest senddata = new StringRequest(Request.Method.POST, "http://192.168.1.68/Kelompok2/api/Booking//tiket", new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject res = new JSONObject(response);
                    status.setText(res.getString("status"));
                    namafutsal.setText(res.getString("nama_futsal"));
                    kodebooking.setText(res.getString("id_booking"));
                    lapangankeberapa.setText(res.getString("nama_lapangan"));
                    tanggal.setText(res.getString("waktu_mulai"));
//                    jambooking.setText(res.getString("waktu_mulai"));
                    harga.setText(res.getString("total_harga"));
                } catch (JSONException e) {
                    e.printStackTrace();
                    found.setVisibility(View.GONE);
                }

//                if(response.equals("")){
//                    Toast.makeText(Booking.this,
//                            "Futsal Tersedia", Toast.LENGTH_SHORT)
//                            .show();
//
//                }else{
//                    Toast.makeText(getBaseContext(),response, Toast.LENGTH_SHORT).show();
//
//                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Log.e("errornyaa ", "" + error);
                found.setVisibility(View.GONE);
                Toast.makeText(getContext(), "Gagal Login, "+error, Toast.LENGTH_SHORT).show();


            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_cust",Preferences.getId(getContext()));
                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(senddata);
    }
}
