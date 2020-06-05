package com.example.futsalbismillah;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

public class akunActivity extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.activity_profil, container, false);

        TextView username = v.findViewById(R.id.atasusername);
        username.setText(Preferences.getKeyUsernameSedangLogin((getContext())));

        TextView username_bawah = v.findViewById(R.id.username);
        username_bawah.setText(Preferences.getKeyUsernameSedangLogin((getContext())));

        TextView nama = v.findViewById(R.id.namalengkap);
        nama.setText(Preferences.getNama(getContext()));

        TextView alamat = v.findViewById(R.id.alamat);
        alamat.setText(Preferences.getAlamat(getContext()));

        TextView telepon = v.findViewById(R.id.telp);
        telepon.setText(Preferences.getTelepon(getContext()));

        TextView email = v.findViewById(R.id.email);
        email.setText(Preferences.getEmail(getContext()));

        TextView password = v.findViewById(R.id.password);
        password.setText(Preferences.getPassword(getContext()));

        TextView konfir_password = v.findViewById(R.id.konfir);
        konfir_password.setText(Preferences.getPassword(getContext()));

        v.findViewById(R.id.btnlogout).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Preferences.clearLoggedInUser(getContext());
                startActivity(new Intent(getContext(), loginActivity.class));
                getActivity().finish();
            }
        });
        return v;
        }
    }

