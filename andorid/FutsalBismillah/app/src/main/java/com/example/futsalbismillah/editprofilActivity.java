package com.example.futsalbismillah;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
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

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Base64;
import java.util.HashMap;
import java.util.Map;

import androidx.appcompat.app.AppCompatActivity;

public class editprofilActivity extends AppCompatActivity {
    private EditText nama, alamat, email, telp, username, password;
    private Button simpan, batal;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_editprofil);
        nama = findViewById(R.id.editnama);
        alamat = findViewById(R.id.editalamat);
        email = findViewById(R.id.editemail);
        telp = findViewById(R.id.edittelp);
        username = findViewById(R.id.editusername);
        password = findViewById(R.id.editpassword);
        simpan = findViewById(R.id.simpan);
        batal = findViewById(R.id.batal);
        tampildata();

        batal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

        simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                updatedata(nama.getText().toString(), alamat.getText().toString(), email.getText().toString(), telp.getText().toString(),
                        username.getText().toString(), password.getText().toString());
//                finish();
                Intent intent = new Intent(editprofilActivity.this, MainActivity.class);
                startActivity(intent);
            }
        });


    }
    private void updatedata(final String nama, final String alamat,
                            final String email, final String telp, final String username, final String password){
        String URL_EDIT ="http://192.168.1.68/Kelompok2/api/auth/edit_simpan/" + Preferences.getId(getBaseContext());
        StringRequest request = new StringRequest(Request.Method.POST, URL_EDIT, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject res = new JSONObject(response);

                    if (res.getBoolean("status")) {
                        JSONObject respon = res.getJSONObject("data");
                        Toast.makeText(editprofilActivity.this, "Data Berhasil Di Simpan", Toast.LENGTH_SHORT).show();
                        Preferences.setKeyUsernameSedangLogin(getBaseContext(),respon.getString("username_cust"));
                        Preferences.setNama(getBaseContext(),respon.getString("nama_cust"));
                        Preferences.setAlamat(getBaseContext(),respon.getString("alamat_cust"));
                        Preferences.setTelepon(getBaseContext(),respon.getString("telp_cust"));
                        Preferences.setEmail(getBaseContext(),respon.getString("email_cust"));
                        Preferences.setPassword(getBaseContext(),respon.getString("password_cust"));
                        Preferences.setId(getBaseContext(),respon.getString("id_cust"));
                    } else {
                        Toast.makeText(getBaseContext(), res.getString("message"), Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        }){
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
        AppController.getInstance().addToRequestQueue(request);
    }

    private void tampildata(){
        String url = "http://192.168.1.68/Kelompok2/api/customer/edit/" + Preferences.getId(getBaseContext());
        StringRequest request = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject res = new JSONObject(response);
                        JSONObject respon = res.getJSONObject("data");
//                        Toast.makeText(editprofilActivity.this, "Data Berhasil Update", Toast.LENGTH_SHORT).show();
                        nama.setText(respon.getString("nama_cust"));
                        alamat.setText(respon.getString("alamat_cust"));
                        email.setText(respon.getString("email_cust"));
                        telp.setText(respon.getString("telp_cust"));
                        username.setText(respon.getString("username_cust"));
                        password.setText(respon.getString("password_cust"));

                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        });
        AppController.getInstance().addToRequestQueue(request);
    }
}
