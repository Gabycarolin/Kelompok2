package com.example.futsalbismillah;


import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.RetryPolicy;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import androidx.appcompat.app.AppCompatActivity;

public class loginActivity extends AppCompatActivity {
    private EditText username, password;
    private Button login;
    private static String URL ="http://192.168.43.239/siballuhuy/api/auth/login";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        username = findViewById(R.id.username);
        password = findViewById(R.id.password);
        login = findViewById(R.id.textView);
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String musername = username.getText().toString().trim();
                String mpassword = password.getText().toString().trim();

                if (!musername.isEmpty() || !mpassword.isEmpty()){
                    login(musername,mpassword);
                }else {
                    username.setError("masukkan username");
                    password.setError("masukkan password");
                }
            }
        });
    }

    public void login(final String username, final String password){
        Log.d("pesan", "berhasil "+username);

        StringRequest senddata = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject res = new JSONObject(response);

                    if(res.getBoolean("status")){
                        JSONObject respon = res.getJSONObject("data");
                                    String name = respon.getString("nama_cust").trim();
                                    String alamat = respon.getString("alamat_cust").trim();
                                    String email = respon.getString("email_cust").trim();
                                    String telp = respon.getString("telp_cust").trim();
                                    String username = respon.getString("username_cust").trim();
                                    String password = respon.getString("password_cust").trim();
//
                                    Toast.makeText(loginActivity.this,
                                            "berhasil login. \nYour Name : "
                                                    +name+"\nYour Alamat : "
                                                    +alamat, Toast.LENGTH_SHORT)
                                            .show();
                                    Preferences.setKeyUsernameSedangLogin(getBaseContext(), username);
                                    Preferences.setNama(getBaseContext(), name);
                                    Preferences.setAlamat(getBaseContext(), alamat);
                                    Preferences.setEmail(getBaseContext(), email);
                                    Preferences.setTelepon(getBaseContext(), telp);
                                    Preferences.setPassword(getBaseContext(), password);
                                    Intent intent = new Intent(loginActivity.this, MainActivity.class);
                                    startActivity(intent);

                    }else{
                        Toast.makeText(getBaseContext(), res.getString("message"), Toast.LENGTH_SHORT).show();

                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

                Log.e("errornyaa ", "" + error);
                Toast.makeText(getBaseContext(), "Gagal Login, "+error, Toast.LENGTH_SHORT).show();


            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("username_cust", username);
                params.put("password_cust", password);

                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(senddata);
    }

}

