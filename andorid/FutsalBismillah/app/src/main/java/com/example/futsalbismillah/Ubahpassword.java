package com.example.futsalbismillah;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.google.android.material.textfield.TextInputEditText;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import androidx.appcompat.app.AppCompatActivity;

public class Ubahpassword extends AppCompatActivity {
    TextInputEditText password, konfir;
    Button submit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ubahpassword);
        password = findViewById(R.id.password);
        konfir = findViewById(R.id.konfirmasipassword);
        submit = findViewById(R.id.submitubahpassword);
        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                simpanpassword(password.getText().toString());
                Intent intent = new Intent(Ubahpassword.this, loginActivity.class);
                startActivity(intent);
            }
        });
    }

    private void simpanpassword(final String password){
        String url = "http://192.168.1.68/siballuhuy/api/auth/ubah_password/" + Preferences.getId(getBaseContext());
        StringRequest request = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject res = new JSONObject(response);

                    if (res.getBoolean("status")) {
                        JSONObject respon = res.getJSONObject("data");
                        Toast.makeText(Ubahpassword.this, "Password Berhasil Di Ubah", Toast.LENGTH_SHORT).show();
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
                params.put("password_cust", password);

                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(request);
    }
}
