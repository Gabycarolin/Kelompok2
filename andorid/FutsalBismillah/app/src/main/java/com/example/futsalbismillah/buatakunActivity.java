package com.example.futsalbismillah;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import androidx.appcompat.app.AppCompatActivity;

public class buatakunActivity extends AppCompatActivity {
        private EditText nama, alamat, telp, email, username, password, konfir;
        private Button simpan, kembali;
        private static String URL = "http://192.168.1.68/siballuhuy/api/auth/registration";

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_buat_akun);
        nama = findViewById(R.id.nama);
        alamat = findViewById(R.id.alamat);
        telp = findViewById(R.id.telp);
        email = findViewById(R.id.email);
        username = findViewById(R.id.usernamedaftar);
        password = findViewById(R.id.passworddaftar);
        konfir = findViewById(R.id.konf);

        simpan = findViewById(R.id.simpan);
        kembali = findViewById(R.id.kembali);

        simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                regist();
                Intent intent = new Intent(buatakunActivity.this, loginActivity.class);
                startActivity(intent);
            }
        });

        kembali.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(buatakunActivity.this, loginActivity.class);
                startActivity(intent);
            }
        });
    }
        private void regist(){
            final String nama = this.nama.getText().toString().trim();
            final String alamat = this.alamat.getText().toString().trim();
            final String telp = this.telp.getText().toString().trim();
            final String email = this.email.getText().toString().trim();
            final String username = this.username.getText().toString().trim();
            final String password = this.password.getText().toString().trim();

            StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    try {
                        JSONObject res = new JSONObject(response);

                        if(res.getBoolean("status")){
                            JSONObject respon = res.getJSONObject("data");
                            Toast.makeText(buatakunActivity.this,
                                    "Berhasil Daftar",
                                    Toast.LENGTH_SHORT).show();
                        }
                    }catch (JSONException e){
                        e.printStackTrace();
                        Toast.makeText(buatakunActivity.this, "Gagal Daftar" + e.toString(), Toast.LENGTH_SHORT).show();
                    }
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(buatakunActivity.this, "Gagal Daftar" + error.toString(), Toast.LENGTH_SHORT).show();
                }
            })
            {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<>();
                    params.put("nama_cust", nama);
                    params.put("alamat_cust", alamat);
                    params.put("email_cust", email);
                    params.put("telp_cust", telp);
                    params.put("username_cust", username);
                    params.put("password_cust", password);
                    return params;
                }
            };
            AppController.getInstance().addToRequestQueue(stringRequest);
        }
    }
